<script>
        postForm = $('#postForm');
        postForm.submit((function (e){
            e.preventDefault();
            let name = $('#name').val();
            let email = $('#email').val();
            let _token = $('#postForm [name="_token"]').val();
            console.log('name ' + name + ' email ' + email + ' _token ' + _token);
            axios.post("{{route('postAjax')}}", {
                name: name,
                email: email,
                _token: _token
            })
                .then(function (response) {
                    console.log(response);
                })
        }));

    </script>
