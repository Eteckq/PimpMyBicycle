<div id="view">

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

let parts = <?= json_decode($build) ?>

$(function() {
    $.ajax({
            url: "/?page=preview&action=getElements",
            method: "GET",
            dataType: "json",
        })
        .then(function(response) {
            let elementsAvailible = []
            for (const name in response) {
                let elem = new Element(name, response[name].type, response[name].svg)
                elementsAvailible[name] = elem
            }
            loadViewer(elementsAvailible, parts)
        })
});

function loadViewer(elementsAvailible, parts){
    let viewer = new Viewer($("#view"),parts, elementsAvailible)
}

class Viewer {
    constructor(viewer, build, availibleElements) {
        this.viewer = viewer
        this.customElements = []
        for (const b of build) {
            this.customElements.push(new CustomElement(availibleElements[b.id], getSlotFromId(b.slot), b.colors))
        }
        this.availibleElements = availibleElements

        this.draw()
    }

    draw() {
        this.viewer.html("")
        for (const customElement of this.customElements) {
            this.drawCustomElement(customElement)
        }
    }

    drawCustomElement(customElement) {
        this.viewer.append('<div style="position: absolute;top: ' + (customElement.getY()-120) + 'px; left: ' + (customElement.getX()-110) + 'px">' + customElement.getSvg() + '</div>')
    }
}

class Element {
    constructor(id, type, svg) {
        this.svg = svg
        this.type = type
        this.id = id
    }

    getColorsNumber() {
        let i = 0
        while (this.svg.search("%COLOR" + i + "%") != -1) {
            i++
        }
        return i
    }
}

class CustomElement {
    constructor(element, slot, colors) {
        this.element = element
        this.slot = slot
        this.colors = colors
    }

    getId() {
        return this.id
    }

    getX() {
        return this.slot.x
    }

    getY() {
        return this.slot.y
    }

    getSvg() {
        let finalSvg = this.element.svg;
        for (let i = 0; i < this.element.getColorsNumber(); i++) {
            let color = this.colors[i];
            if (color == null) {
                color = "#000000"
            }
            finalSvg = finalSvg.split("%COLOR" + i + "%").join(color)
        }
        return finalSvg
    }
}

const Type = {
    Roue: 1,
    Guidon: 2,
    Selle: 3,
    Cadre: 4
}

const Slot = {
    Roue1: {
        id: 0,
        x: 140,
        y: 270
    },
    Roue2: {
        id: 1,
        x: 355,
        y: 270
    },
    Guidon: {
        id: 2,
        x: 408,
        y: 148
    },
    Selle: {
        id: 3,
        x: 230,
        y: 140
    },
    Cadre: {
        id: 4,
        x: 180,
        y: 200
    }
}

function getSlotFromId(id){
    for (const s in Slot) {
        current = Slot[s]
        if(current.id == id){
            return current
        }
    }
}

</script>