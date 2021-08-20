<script>
    let countAllComments = $('#count-all-comments');
    let commentsList = $('#comments');
    let commentsContainer = $('#commentsContainer');
    countAllComments.on('click',function (e){
        let count = countAllComments.val();
        console.log("{{request()->url() . '/'}}" + count);
        axios.get('{{request()->url() . '/'}}' + count)
            .then(function (response) {
                return response.data;
            })
            .then(function (response){
                commentsContainer.prepend(response);
                commentsList.remove();
                }
            )
    });
</script>
