const checkboxes = document.querySelectorAll('input[type=checkbox]');
for (const checkbox of checkboxes) {
    checkbox.addEventListener('change', ev => {
        checkbox.form.submit();
    });
}