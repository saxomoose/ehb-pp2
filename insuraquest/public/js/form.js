window.onload= () => {
    document.getElementById('edit-button').addEventListener('click', ()=>{

        let edit_block = document.getElementById('edit-form');

        if(edit_block.style.display === 'none') {
            document.getElementById('edit-form').style.display="block";
        }else document.getElementById('edit-form').style.display="none";
    })
}
