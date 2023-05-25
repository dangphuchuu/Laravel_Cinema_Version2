<!DOCTYPE html>

<html>

<head>

    <title>Add/remove multiple input fields dynamically with Jquery Laravel 5.8</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>

<div >

    <h2 align="center">Add/remove multiple input fields dynamically with Jquery Laravel 5.8</h2>

    <form action="combo/detail/1" method="POST">

        @csrf

        @if ($errors->any())

            <div >

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        @if (Session::has('success'))

            <div >

                <a href="#"  data-dismiss="alert" aria-label="close">×</a>

                <p>{{ Session::get('success') }}</p>

            </div>

        @endif

        <table  id="dynamicTable">

            <tr>

                <th>Name</th>

                <th>Qty</th>

                <th>Price</th>

                <th>Action</th>

            </tr>

            <tr>

                <td><input type="text" name="addmore[0][name]" placeholder="Enter your Name"  /></td>

                <td><input type="text" name="addmore[0][qty]" placeholder="Enter your Qty"  /></td>

                <td><input type="text" name="addmore[0][price]" placeholder="Enter your Price"  /></td>

                <td><button type="button" name="add" id="add" >Add More</button></td>

            </tr>

        </table>

        <button type="submit" >Save</button>

    </form>

</div>

<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;

        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name"  /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty"  /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price"  /></td><td><button type="button" >Remove</button></td></tr>');

    });

    $(document).on('click', '.remove-tr', function(){

        $(this).parents('tr').remove();

    });

</script>

</body>

</html>
