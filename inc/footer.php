</body>

<!-- myScript -->
<script src="<?= ASSETS; ?>my-js/myScript.js"></script>
<!-- myScript -->

<!-- jquery file -->
<script src="<?= ASSETS; ?>jQuery/jQuery-v3.6.3.js"></script>
<!-- end jquery file -->

<!-- dataTables javascript file -->
<script type="text/javascript" src="<?= ASSETS; ?>dataTables-js/datatables.min.js"></script>
<!-- end dataTables javascript file -->

<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>

</html>
<?php ob_end_flush(); ?>