let openModal = document.querySelector('.openModal');
            modal = document.getElementById('modal');
            body = document.getElementById('body');
            closeModal = document.querySelector('.modal-close');

        openModal.addEventListener("click", () =>{
            modal.className = 'modal-on';
            body.style.overflow = 'hidden';
        })

        closeModal.addEventListener("click", () =>{
            modal.className = 'modal-off';
            body.style.overflow = 'auto';
        })