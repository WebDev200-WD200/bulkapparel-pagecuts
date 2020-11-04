
const genSidebar = () => {
    const list = ['T-Shirts', 'Sweatshirts', 'Polos', 'Ladies', 'Kids', 'Athletics', 'Workwear', 'Jackets', 'Hats', 'Face-Masks', 'Shop Brands'];
    const subList = ['Cotton-100%', 'Cotton-Over 50%', 'Women', 'Mens', 'Youth', 'Pockets', 'Sleeeveless', 'V-Neck', 'Tank Tops', 'Crewnect Collar', 'Athelitics']
    let template = '';
    let subTemplate = '';


    subList.forEach(item=> {
        subTemplate += `
            <li class="sidebar__sub-item">
                <a href="/#" class="sidebar__sub-link">
                 ${item}
                </a>
            </li>
        `
    })

    list.forEach((item, idx) => {

        template += `
            <li class="sidebar__item ${idx === 0 ? 'show-sub-list': ''}">
            <div class="sidebar__item-header">
                <a class="sidebar__item-link" href="/#">${item}</a>

                <button class="btn sidebar__item-btn">
                    <img src="./assets/img/chevron-right.svg" alt="">
                </button>

                
            </div>
            <ul class="sidebar__sub">
                ${subTemplate}
            </ul>
        </li>
    `
    })
    document.querySelector('.sidebar__list').innerHTML = template;
}

genSidebar();