function openAdd() {
    document.getElementById("modal").style.display = "block";
    document.getElementById("modalContent").innerHTML = `
        <h3>Add Item</h3>
        <form method='POST' action='add.php' enctype='multipart/form-data'>
        <label for='name'>Item Name</label>
            <input id='name' name='name' placeholder='Enter item name' required>
            
            <label for='size'>Size</label>
            <input id='size' name='size' placeholder='Enter size'>
            
            <label for='quantity'>Quantity</label>
            <input id='quantity' name='quantity' type='number' placeholder='Enter quantity'>
            
            <label for='model'>Model</label>
            <input id='model' name='model' placeholder='Enter model'>
            
            <label for='location'>Location</label>
            <input id='location' name='location' placeholder='Enter location'>
            
            <label for='purchase_date'>Purchase Date</label>
            <input id='purchase_date' name='purchase_date' type='date'>
            
            <label for='notes'>Notes</label>
            <textarea id='notes' name='notes' placeholder='Any additional info'></textarea>
            
            <label for='image'>Image</label>
            <input id='image' type='file' name='image'>

            <button type='submit'>Save</button>
            <button type='button' onclick='closeModal()'>Cancel</button>
        </form>
    `;
}

function openEdit(item) {
    document.getElementById("modal").style.display = "block";
    document.getElementById("modalContent").innerHTML = `
        <h3>Edit Item</h3>
        <form method='POST' action='update.php' enctype='multipart/form-data'>
             <label for='name'>Item Name</label>
            <input id='name' name='name' value='${item.name}'>
            
            <label for='size'>Size</label>
            <input id='size' name='size' value='${item.size}'>
            
            <label for='quantity'>Quantity</label>
            <input id='quantity' name='quantity' type='number' value='${item.quantity}'>
            
            <label for='model'>Model</label>
            <input id='model' name='model' value='${item.model}'>
            
            <label for='location'>Location</label>
            <input id='location' name='location' value='${item.location}'>
            
            <label for='purchase_date'>Purchase Date</label>
            <input id='purchase_date' name='purchase_date' type='date' value='${item.purchase_date}'>
            
            <label for='notes'>Notes</label>
            <textarea id='notes' name='notes'>${item.notes}</textarea>
            
            <label for='image'>Image</label>
            <input id='image' type='file' name='image'>
            <button type='submit'>Update</button>
            <button type='button' onclick='closeModal()'>Cancel</button>
        </form>
    `;
}

function closeModal() {
    document.getElementById("modal").style.display = "none";
}

document.getElementById("search").onkeyup = function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#tableBody tr");

    rows.forEach(r => {
        r.style.display = r.innerText.toLowerCase().includes(value) ? "" : "none";
    });
};
