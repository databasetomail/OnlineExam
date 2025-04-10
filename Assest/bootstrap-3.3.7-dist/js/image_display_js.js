function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photo')
                    .attr('src', e.target.result)
                    .width(160)
                    .height(179);
        };

        reader.readAsDataURL(input.files[0]);
    }
}