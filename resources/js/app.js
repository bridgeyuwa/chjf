import './bootstrap';

import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';

// Register plugins
Alpine.plugin(intersect);
Alpine.plugin(collapse);

// Persist toast queue on window for cross-component access
window.chjToast = (message, type = 'success') => {
    window.dispatchEvent(
        new CustomEvent('chj-toast', { detail: { message, type, id: Date.now() } })
    );
};

Alpine.data('chjForm', () => ({
    submitting: false,
    errors: {},
    init() {
        // Capture Laravel validation errors from the page flash
        this.errors = window.__chjErrors || {};
    },
    validateField(field, rules) {
        const value = this.$el.value?.trim() ?? '';
        let error = '';
        for (const rule of rules.split('|')) {
            const [name, param] = rule.split(':');
            if (name === 'required' && !value) { error = 'This field is required.'; break; }
            if (name === 'email' && value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) { error = 'Please enter a valid email address.'; break; }
            if (name === 'min' && value.length < Number(param)) { error = `Must be at least ${param} characters.`; break; }
            if (name === 'max' && value.length > Number(param)) { error = `Must be no more than ${param} characters.`; break; }
            if (name === 'phone' && value && !/^[+]?[\d\s\-()]{7,20}$/.test(value)) { error = 'Please enter a valid phone number.'; break; }
        }
        if (error) {
            this.errors[field] = error;
        } else {
            delete this.errors[field];
        }
    },
    hasError(field) {
        return Boolean(this.errors[field]);
    },
    async submit(event) {
        const form = event.target;
        // HTML5 + manual re-validation
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        this.submitting = true;
        // Let the browser submit natively. Alpine toasts are triggered
        // by Laravel's redirect back with('status') which we read in the page.
        form.submit();
    },
}));

// Mobile nav drill-down (also drives header scroll state — both live on <header>)
Alpine.data('mobileNav', () => ({
    open: false,
    scrolled: false,
    expanded: {},
    toggle(group) {
        this.expanded[group] = !this.expanded[group];
    },
    close() {
        this.open = false;
        this.expanded = {};
        document.body.style.overflow = '';
    },
}));

// Toast stack
Alpine.data('toastStack', () => ({
    toasts: [],
    init() {
        window.addEventListener('chj-toast', (e) => {
            this.push(e.detail);
        });
        // Laravel redirect flash → trigger toast on load
        const flash = window.__chjFlash;
        if (flash?.status) {
            this.push({ message: flash.status, type: 'success', id: Date.now() });
        }
    },
    push(toast) {
        this.toasts.push(toast);
        setTimeout(() => this.dismiss(toast.id), 5000);
    },
    dismiss(id) {
        this.toasts = this.toasts.filter((t) => t.id !== id);
    },
}));

// FAQ accordion
Alpine.data('accordion', (defaultOpen = null) => ({
    open: defaultOpen,
    toggle(id) {
        this.open = this.open === id ? null : id;
    },
}));

// Scroll reveal — toggles is-visible on the element when it enters viewport
Alpine.data('reveal', (delay = 0) => ({
    init() {
        if (delay) this.$el.style.transitionDelay = `${delay}ms`;
    },
    onIntersect() {
        this.$el.classList.add('is-visible');
    },
}));

// Copy-to-clipboard for donate page bank details
Alpine.data('copyable', (text) => ({
    copied: false,
    async copy() {
        try {
            await navigator.clipboard.writeText(text);
            this.copied = true;
            window.chjToast('Copied to clipboard', 'success');
            setTimeout(() => (this.copied = false), 2000);
        } catch (e) {
            window.chjToast('Could not copy — please copy manually', 'error');
        }
    },
}));

window.Alpine = Alpine;
Alpine.start();
