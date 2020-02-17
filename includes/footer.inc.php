<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/trumbowyg.min.js" integrity="sha256-oFd4Jr73mXNrGLxprpchHuhdcfcO+jCXc2kCzMTyh6A=" crossorigin="anonymous"></script>
<script>
    $('#editor').trumbowyg();
    let editDrop = document.querySelector('.edit-drop');
    let editDropMenu = document.querySelector('#edit-drop-menu');
    editDrop.onclick = function() {
        editDropMenu.classList.toggle('show');
    }
</script>

</body>

</html>