const Type = {
    Roue: 1,
    Guidon: 2,
    Selle: 3
}

const Slot = {
    Roue1: {x:75, y:300},
    Roue2: {x:350, y:300},
    Guidon: {x:325, y:170}
}

class Element{
    constructor(id, type, svg){
        this.svg = svg
        this.type = type
        this.id = id
    }

    getColorsNumber(){
        let i = 0
        while(this.svg.search("%COLOR"+i+"%") != -1){
            i++
        }
        return i
    }

    getBlackSvg(){
        let i = 0
        let resultSvg = this.svg
        while(resultSvg.search("%COLOR"+i+"%") != -1){
            resultSvg = resultSvg.split("%COLOR"+i+"%").join("black")
            i++
        }
        return resultSvg
    }
}

class CustomElement{
    constructor(element, slot, colors){
        this.element = element
        this.slot = slot
        this.colors = colors
    }

    getId(){
        return this.id
    }

    getX(){
        return this.slot.x
    }

    getY(){
        return this.slot.y
    }

    getSvg(){
        let finalSvg = this.element.svg;
        for (let i = 0; i < this.element.getColorsNumber(); i++) {
            let color = this.colors[i];
            if(color == null){
                color = "#000000"
            }
            finalSvg = finalSvg.split("%COLOR"+i+"%").join(color)
        }
        return finalSvg
    }
}

class Editor {

    constructor(editor, build, availibleElements) {
        this.editor = editor
        this.customElements = []
        for (const b of build) {
            this.customElements.push(new CustomElement(availibleElements[b.id], b.slot, b.colors))
        }
        this.availibleElements = availibleElements

        this.redraw()
    }

    redraw(){
        this.editor.html("")
        for (const customElement of this.customElements) {
            this.drawCustomElement(customElement)
        }
    }

    drawCustomElement(customElement){
        this.editor.append('<div id="'+ customElement.getX() + "-" + customElement.getY() +'" style="position: absolute;top: '+ customElement.getY() +'px; left: '+ customElement.getX() +'px">' + customElement.getSvg() + '</div>')
    }

    changeColor(slot, colors){
        let ce = this.getCustomElementFromSlot(slot)
        ce.colors = colors

        this.redraw()
    }

    addCustomElement(id, slot, colors){
        if(this.availibleElements[id] == null){
            return
        }
        let element = this.getCustomElementFromSlot(slot)
        if(element != null){
            this.modifyCustomElement(slot, id, colors)
        } else {
            element = new CustomElement(this.availibleElements[id], slot, colors)
            this.customElements.push(element)
        }
        this.redraw()
    }

    getCustomElementFromSlot(slot){
        for (const customElement of this.customElements) {
            if(customElement.slot.x == slot.x && customElement.slot.y == slot.y) {
                return customElement
            }
        }
        return null
    }

    modifyCustomElement(slot, newId, colors){
        for (const key in this.customElements) {
            let elem = this.customElements[key]
            if(elem.slot.x == slot.x && elem.slot.y == slot.y) {
                this.customElements[key] = new CustomElement(this.availibleElements[newId], slot, colors)
                return
            }
        }
    }

    getCustomElements(){
        return this.customElements
    }

}

class Menu {

    constructor(editor){
        this.editor = editor
        this.selectedSlot = null
    }



    selectSlot(slot){
        $("#shape").html("")
        $("#pickers").html("")
        this.selectedSlot = slot
        this.displayMenuFromSlot(slot)
    }

    clickOnShape(){
        if(this.selectedSlot == null){
            return
        }

        this.displayShape();
    }

    getSelectedColors(){
        let colors = []
        $(".colorPicker").each(function() {
            colors.push($(this).val())
        });
        return colors
    }

    updateColors(){
        let colors = this.getSelectedColors()

        this.editor.changeColor(this.selectedSlot, colors)
    }

    setShapes(svgs){
        $("#shape").html("")
        for (const svg of svgs) {
            let svgContent = $(svg.svg);
            svgContent.click(()=>{
                this.editor.addCustomElement(svg.name, this.selectedSlot, this.getSelectedColors())
                this.selectSlot(this.selectedSlot)
            })
            $("#shape").append(svgContent)
        }
    }

    displayMenuFromSlot(slot){
        let customElement = this.editor.getCustomElementFromSlot(slot)
        if(customElement == null){
            return
        }
        this.displayColorPickers(customElement)
    }
    
    displayColorPickers(customElement){
        let count = customElement.element.getColorsNumber()
        $("#pickers").html("")
        for (let i = 0; i < count; i++) {
            let input = $('<input type="color" class="colorPicker" pickerid='+i+' value='+ customElement.colors[i] +'>')
            input.change(()=>this.updateColors())
            $("#pickers").append(input)
        }
    }
    
    
    displayShape(){
        if(this.selectedSlot == Slot.Roue1){
            this.setShapes(getSvgsFromType(Type.Roue))
        }
        if(this.selectedSlot == Slot.Roue2){
            this.setShapes(getSvgsFromType(Type.Roue))
        }
        if(this.selectedSlot == Slot.Guidon){
            this.setShapes(getSvgsFromType(Type.Guidon))
        }
    }

}



let editor
let menu

$(function() {
    let build = loadBuild(0)

    editor = new Editor($("#view"), build, getAvailibleElements())
    menu = new Menu(editor)
});

function loadBuild(id){
    let json
    if(id == 0){
        json = '[{"id":"roue1","slot":{"x":75,"y":300},"colors":["#EE0000","#0000EE"]},{"id":"roue0","slot":{"x":350,"y":300},"colors":["#000000","#00FF00"]},{"id":"guidon1","slot":{"x":325,"y":170},"colors":["#ff8040"]}]'
    } else {
        //load JSON with ajax from db
    }

    return JSON.parse(json)
}

function saveBuild(){
    let result = []
    for (const customElement of editor.getCustomElements()) {
        result.push({
            id: customElement.element.id,
            slot: customElement.slot,
            colors: customElement.colors
        })
        
    }
    return JSON.stringify(result);
}

function getAvailibleElements(){
    let roue0 = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="100px" height="100px" viewBox="-53 -3 106 106"><path d="M0,0 A 50 50, 0, 0 0, 0 100" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d="M0,0 A 50 50, 0, 1 1, 0 100" fill="none" stroke="%COLOR1%" stroke-width="6"/></svg>';
    let roue1 = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="110px" height="110px" viewBox="-53 -3 106 106"><path d ="M0,0 A 50 50, 0, 0 0, 0 100" fill="none" stroke="%COLOR1%" stroke-width="6"/>    <path d ="M0,0 A 50 50, 0, 1 1, 0 100" fill="none" stroke="%COLOR1%" stroke-width="6"/><path d ="M0,20 A 30 30, 0, 0 0, 0 80" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M0,20 A 30 30, 0, 1 1, 0 80" fill="none" stroke="%COLOR0%" stroke-width="6"/></svg>'
    let guidon0 = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="110px" height="110px" viewBox="-70 -3 130 100"><path d ="M-40 0 L 30 0" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M-40 30 L 30 30" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M-39,0 A 15 15, 0, 0 0, -39 30" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M-30,30 L-45,60" fill="none" stroke="%COLOR0%" stroke-width="6"/></svg>'
    let guidon1 = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="110px" height="110px" viewBox="-70 -3 130 100"><path d ="M-40 0 L 30 0" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M-55 30 L 15 30" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M-30,30 L-45,60" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M-37 0 A 8 8, 1, 1 1, -52 30" fill="none" stroke="%COLOR0%" stroke-width="6"/></svg>'
    let guidon2 = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="110px" height="110px" viewBox="-70 -3 130 100"><path d ="M-40 0 L 30 0" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M-55 30 L 15 30" fill="none" stroke="%COLOR1%" stroke-width="6"/><path d ="M-30,30 L-45,60" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M-37 0 L -52 30" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M27 0 L 30 -5" fill="none" stroke="%COLOR0%" stroke-width="6"/><path d ="M12 30 L 15 25" fill="none" stroke="%COLOR0%" stroke-width="6"/></svg>'  
    
    let elementsAvailible = []
    elementsAvailible["roue0"] = new Element("roue0", Type.Roue, roue0)
    elementsAvailible["roue1"] = new Element("roue1", Type.Roue, roue1)
    elementsAvailible["guidon0"] = new Element("guidon0", Type.Guidon, guidon0)
    elementsAvailible["guidon1"] = new Element("guidon1", Type.Guidon, guidon1)
    elementsAvailible["guidon2"] = new Element("guidon2", Type.Guidon, guidon2)
    

    return elementsAvailible
}

function getSvgsFromType(type){
    let svgs = []
    
    let aE = getAvailibleElements();

    for (const key in aE) {
        elem = aE[key]
        if(elem.type == type){
            svgs.push({
                name: elem.id,
                svg: elem.getBlackSvg()
            })
            
        }
    }
    
    return svgs
}

function onSlot(id){
    let slot
    switch (id) {
        case 0:
            slot = Slot.Roue1
            break;
        case 1:
            slot = Slot.Roue2
            break;
        case 2:
            slot = Slot.Guidon
            break;
    }
    menu.selectSlot(slot)
}

function onSave(){
    console.log(saveBuild());
    
}

function onShape(){
    menu.clickOnShape()
}