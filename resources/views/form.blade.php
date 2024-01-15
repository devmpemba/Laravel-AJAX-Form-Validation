<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
   
<body>

    <!-- Loading overlay -->
    <div id="loading-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.7); z-index: 9999;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <img src="{{ asset('spinner.gif') }}" alt="Loading spinner">
        </div>
    </div>

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
        $(document).ready(function() {
            $('#addpost').on('submit', function(event) {
                event.preventDefault();

                // Show loading overlay
                $('#loading-overlay').show();

                $.ajax({
                    url: "{{ url('ajaxupload') }}",
                    data: $('#addpost').serialize(),
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        // Your success logic
                        alert('Data added successfully!');
                    },
                    error: function(xhr, status, error) {
                        console.error('Ajax request failed:', xhr.responseText);
                        alert('Error adding data. Please try again.');
                    },
                    complete: function() {
                        // Hide loading overlay after request is complete
                        $('#loading-overlay').hide();
                    }
                });
            });
        });
    </script>
</body>
</html>
