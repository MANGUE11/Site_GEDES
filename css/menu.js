function ouvrirFermerSpoiler(div) {
        var divContenu = div.getElementsByTagName('ul')[0];
        if(divContenu.style.display == 'none') {
            divContenu.style.display = 'block';
        } else {
            divContenu.style.display = 'none';
        }
    }