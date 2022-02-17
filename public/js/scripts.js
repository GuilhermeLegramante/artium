document.addEventListener('livewire:load', function() {

    var modal = document.getElementById("modal-delete");
    var btn = document.getElementById("btnOpen");
    var span = document.getElementById("spanClose");
    var close = document.getElementById("btnClose");

    if (btn !== null) {
        btn.onclick = function() {
            modal.style.display = "block";
        }
    }

    span.onclick = function() {
        modal.style.display = "none";
        modalAuthor.style.display = "none";
    }

    close.onclick = function() {
        modal.style.display = "none";
    }

    var modalAuthor = document.getElementById("modal-select-author");
    var selectAuthor = document.getElementById("selectAuthor");
    var spanAuthor = document.getElementById("spanCloseAuthor");

    if (modalAuthor !== null) {
        selectAuthor.onclick = function() {
            modalAuthor.style.display = "block";
        }
        spanAuthor.onclick = function() {
            modalAuthor.style.display = "none";
        }

        window.livewire.on('showAuthorModal', () => {
            modalAuthor.style.display = "block";
        });

        window.livewire.on('closeAuthorModal', () => {
            modalAuthor.style.display = "none";
        });
    }

    var modalPublisher = document.getElementById("modal-select-publisher");
    var selectPublisher = document.getElementById("selectPublisher");
    var spanPublisher = document.getElementById("spanClosePublisher");

    if (modalPublisher !== null) {
        selectPublisher.onclick = function() {
            modalPublisher.style.display = "block";
        }

        spanPublisher.onclick = function() {
            modalPublisher.style.display = "none";
        }

        window.livewire.on('showPublisherModal', () => {
            modalPublisher.style.display = "block";
        });

        window.livewire.on('closePublisherModal', () => {
            modalPublisher.style.display = "none";
        });
    }

    var modalBook = document.getElementById("modal-select-book");
    var selectBook = document.getElementById("selectBook");
    var spanBook = document.getElementById("spanCloseBook");

    if (modalBook !== null) {
        selectBook.onclick = function() {
            modalBook.style.display = "block";
        }

        spanBook.onclick = function() {
            modalBook.style.display = "none";
        }

        window.livewire.on('showBookModal', () => {
            modalBook.style.display = "block";
        });

        window.livewire.on('closeBookModal', () => {
            modalBook.style.display = "none";
        });
    }
})