let form = document.querySelector('form')
form.addEventListener('submit', (event) => {
    let title = form.elements['title'].value ? form.elements['title'].value : ''
    let author = form.elements['author'].value ? form.elements['author'].value : ''
    let score = form.elements['score'].value ? form.elements['score'].value : 0
    let platform = document.querySelector('input[name=platform]:checked') ?
        document.querySelector('input[name=platform]:checked').id : ''
    event.preventDefault()
})


let jsonFile = fetch('/resources/SKGameIndex.json')

let json = jsonFile.then((response) => response.json().then((data) => {
    gameList = [];
    let tbody = document.querySelector('tbody')
    for (let i = 0; i < data.length; i++) {
        gameList[i] = data[i]
        let tr = document.createElement('tr')
        let td = document.createElement('td')
        let td1 = document.createElement('td')
        let td2 = document.createElement('td')
        let td3 = document.createElement('td')
        let td4 = document.createElement('td')
        td.textContent = `${gameList[i]['date']}`
        td1.innerHTML = `<a href=${gameList[i]['link']}>${gameList[i]['title']}</a>`
        td2.textContent = `${gameList[i]['author']}`
        td3.textContent = `${gameList[i]['score']}`
        td4.textContent = `${gameList[i]['platform']}`
        tr.appendChild(td)
        tr.appendChild(td1)
        tr.appendChild(td2)
        tr.appendChild(td3)
        tr.appendChild(td4)
        tbody.appendChild(tr)
    }
}))

