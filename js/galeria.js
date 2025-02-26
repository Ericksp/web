
const galleryItems = document.querySelectorAll('.gallery-item');
const modal = document.getElementById('modal');
const modalImage = document.getElementById('modal-image');
const closeModal = document.querySelector('.close');

galleryItems.forEach(item => {
    item.addEventListener('click', () => {
    modal.style.display = 'block';
    modalImage.src = item.src;
});
});

closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === modal) {
    modal.style.display = 'none';
}
});
