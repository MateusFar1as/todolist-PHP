document.querySelectorAll('.editButton').forEach(button => {
  button.addEventListener('click', function() {
    this.style.display = 'none';
    const editForm = this.nextElementSibling;
    editForm.style.display = 'flex';

    const deleteForm = editForm.nextElementSibling;
    deleteForm.style.display = 'none';
  });
});

document.querySelectorAll('.updateButtonCancel').forEach(button => {
  button.addEventListener('click', function() {
    const editForm = this.closest('form.editForm');
    const editButton = editForm.previousElementSibling;

    editForm.style.display = 'none';
    editButton.style.display = 'block';

    const deleteForm = editForm.nextElementSibling;
    deleteForm.style.display = 'flex';
  });
});
