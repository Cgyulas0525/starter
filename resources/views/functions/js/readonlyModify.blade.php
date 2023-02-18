<script type="text/javascript">
function ReadonlyBackgroundModify(selector) {
    var divs = document.querySelectorAll(selector);
    for (var k in divs) {
        if(divs[k].readOnly){
            divs[k].setAttribute('style', 'background-color: lightgray');
        }
    }
    return true;
}
</script>
