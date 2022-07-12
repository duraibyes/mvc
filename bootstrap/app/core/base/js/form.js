
var formError = '<?= json_encode(formError()) ?>';
if( formError != 'null' ) {
    var formError = JSON.parse(formError);
    console.log (  formError);
    Object.entries(formError).map( (errors) => {
        let container = document.createElement("div");
        let parentDiv = document.querySelectorAll('.dj-form-validate input[name='+errors[0]+']')[0];
        parentDiv.classList.add('dj-input-has-error')
        container.innerHTML = errors[1];
        container.classList.add('dj-input-error');
        parentDiv.parentNode.insertBefore(container, parentDiv.nextSibling);
    });
}