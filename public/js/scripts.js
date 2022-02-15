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
        modalAuthor.style.display = "none";
    }

    var modalAuthor = document.getElementById("modal-select-author");
    var selectAuthor = document.getElementById("selectAuthor");
    var spanAuthor = document.getElementById("spanCloseAuthor");

    selectAuthor.onclick = function() {
        modalAuthor.style.display = "block";
    }

    spanAuthor.onclick = function() {
        modalAuthor.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    window.livewire.on('showAuthorModal', () => {
        modalAuthor.style.display = "block";
    });

    window.livewire.on('closeAuthorModal', () => {
        modalAuthor.style.display = "none";
    });
})