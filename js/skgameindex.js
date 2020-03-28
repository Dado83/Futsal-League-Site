let jsonFile = fetch('/resources/sk.json')
let tbody = document.querySelector('tbody')

let form = document.querySelector('form')
form.addEventListener('submit', (event) => {
    event.preventDefault()

    let title = form.elements['title'].value ? form.elements['title'].value : ''
    let author = form.elements['author'].value ? form.elements['author'].value : ''
    let score = form.elements['score'].value ? form.elements['score'].value : 0
    let platform = document.querySelector('input[name=platform]:checked') ?
        document.querySelector('input[name=platform]:checked').id : ''
    if (platform === 'desktop') {
        platform = ['pc', 'mac', 'windows', 'ram', 'os', 'linux']
    } else if (platform === 'console') {
        platform = ['xbox', 'playstation', '360', 'one', 'ps3', 'wii', 'switch', 'ps4',
            'ps', 'xone', 'nds', 'nintendo', 'GCN', 'GBA', 'ds', '3ds', 'psvita',
            'gameboy', 'sega', 'atari', 'gamecube', 'dreamcast', 'gage', 'nes']
    } else if (platform === 'mobile') {
        platform = ['android', 'iso', 'steam']
    }

    let result = gameList
        .filter(game => game['title'].toLowerCase().includes(title.toLowerCase()))
        .filter(game => game['author'].toLowerCase().includes(author.toLowerCase()))
        .filter(game => game['score'] >= score)
        .filter(game => platform.some(s => game['platform'].toLowerCase().includes(s)))
    tbody.innerHTML = ''
    createTable(result)
})


form.addEventListener('reset', (event) => {
    tbody.innerHTML = ''
    createTable(gameList)
})


gameList = [];
jsonFile.then((response) => response.json().then((data) => {
    for (let i = 0; i < data.length; i++) {
        gameList[i] = data[i]
    }
    createTable(gameList)
}))


function createTable(list) {
    document.querySelector('span').innerHTML = list.length
    for (let i = 0; i < list.length; i++) {
        let tr = document.createElement('tr')
        let td = document.createElement('td')
        let td1 = document.createElement('td')
        let td2 = document.createElement('td')
        let td3 = document.createElement('td')
        let td4 = document.createElement('td')
        td.textContent = `${list[i]['date']}`
        td1.innerHTML = `<a href=${list[i]['link']}>${list[i]['title']}</a>`
        td2.textContent = `${list[i]['author']}`
        td3.textContent = `${list[i]['score']}`
        td4.textContent = `${list[i]['platform']}`
        tr.appendChild(td)
        tr.appendChild(td1)
        tr.appendChild(td2)
        tr.appendChild(td3)
        tr.appendChild(td4)
        tbody.appendChild(tr)
    }
}

