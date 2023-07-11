
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<!-- Bootstrap CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

<style>

/* #example_wrapper {
        max-width: 100%;
        overflow-x: auto;
    }
 */

 table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }

</style>


<div id="tabimages" style="position:absolute;top:460px;left:30px;">
	
  <table>
    <thead>
      <tr>
        <th></th> <!-- Empty header cell for the left column -->
        <th>Header 1</th>
        <th>Header 2</th>
        <th>Header 3</th>
        <!-- Add more headers as needed -->
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Label 1</td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
      </tr>
      <tr>
        <td>Label 2</td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td><input type="text"></td>
      </tr>
      <!-- Add more rows as needed -->
    </tbody>
  </table>



</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#example').DataTable({
            scrollY: 200,
            scrollX: true,
            });
        });
    </script>


<script>
	$(document).ready(function() {
		$("#tabimages").prependTo("#tab_i1_data");
		$(".dot").hover(function() {
			var temp = $(this).attr('id');
			var index = temp.slice(-1);
			slideIndex = index;
			showSlides(index);
		})

	});

	
</script>