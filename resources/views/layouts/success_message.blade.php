<div class="fixed top-0 right-0 m-4 bg-green-400 py-2 px-4 rounded-sm text-white" id="messagebox">
    {{ $success}}
</div>

<script>
    setTimeout(function() {
        $('#messagebox').fadeOut(500);
    }, 1500);
</script>