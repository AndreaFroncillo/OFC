// Form submissions
const submissionForms = document.querySelector('#submissions-form');
submissionForms.forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Simple form validation
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.borderColor = 'var(--primary-color)';
            } else {
                field.style.borderColor = '#e9ecef';
            }
        });
        
        if (isValid) {
            // Show success message
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Inviato con successo!';
            submitBtn.style.background = '#28a745';
            
            setTimeout(() => {
                submitBtn.textContent = originalText;
                submitBtn.style.background = '';
                this.reset();
            }, 3000);
        } else {
            alert('Per favore, compila tutti i campi obbligatori.');
        }
    });
});