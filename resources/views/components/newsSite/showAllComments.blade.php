<script>
    let getAllComments = $('#get-all-comments');
    let commentsList = $('#comments');
    let commentsContainer = $('#commentsContainer');

    getAllComments.on('click',function (){
        let count = getAllComments.val();
        console.log("{{request()->url() . '/'}}" + count);
        axios.get('{{request()->url() . '/'}}' + count)
            .then(function (response) {
                return response.data;
            })
            .then(function (response){
                commentsContainer.after(response);
                }
            )
        getAllComments.remove();
    });
</script>
