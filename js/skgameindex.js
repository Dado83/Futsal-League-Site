let form = document.querySelector('form');
form.addEventListener('submit', (event) => {
    let title = form.elements['title'].value ? form.elements['title'].value : ''
    let author = form.elements['author'].value ? form.elements['author'].value : ''
    let score = form.elements['score'].value ? form.elements['score'].value : 0
    let platform = document.querySelector('input[name=platform]:checked') ?
        document.querySelector('input[name=platform]:checked').id : ''
    console.log(title + author + score + platform)
    event.preventDefault()
})

