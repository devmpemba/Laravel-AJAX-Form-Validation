<!DOCTYPE html>
<html>
    <head>
        <title>
            Form
        </title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
   
    <body>

        <form action="{{ url('ajaxupload') }}" method="POST" id="addpost">
                @csrf

            <div>
                <label>Title</label>
                <input type="text" name="title">
            </div>

            <div>
                <label>Description</label>
                <input type="text" name="description">
            </div>

            <div>
                <label>Author Name</label>
                <input type="text" name="author">
            </div>

            <div>
                
                <input type="submit" value="add">
            </div>

        </form>


        <script type="text/javascript">
        $(document).ready(function() 
        {
            $('#addpost').on('submit', function(event)
            {
                event.preventDefault(); //prevent browser from reloading
                
                jQuery.ajax({
                    url: "{{ url('ajaxupload') }}",
                    data: jQuery('#addpost').serialize(),
                    type: 'post',

                    success:function(result)
                    {
                            alert('success');
                    }
                })

                //alert('hello'); 

            });



        });
    

            </script>


    </body>


</html>