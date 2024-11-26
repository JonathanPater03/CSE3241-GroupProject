document.addEventListener('DOMContentLoaded', function() {
    const maxStockEntries = 4;
    const addButton = document.getElementById('addStock');
    const dynamicFieldsContainer = document.querySelector('.dynForm');

    function addStockForm() {
        const stockEntries = dynamicFieldsContainer.querySelectorAll('.dynFormEntry');
        if (stockEntries.length >= maxStockEntries) return;
        const newStockEntry = document.createElement('div');
        newStockEntry.className = 'dynFormEntry';
        newStockEntry.innerHTML = `
            <br>
            <label for="stockSymbol">Enter Stock Abbreviation Symbol</label>
            <input type="text" id="stockSymbol" name="stockSymbol[]" required>
            <br>
            <label for="partialAmt">Amount to Invest in This Stock</label>
            <input type="number" id="partialAmt" name="partialAmt[]" step="0.01" required>
        `;
        if (stockEntries.length > 0) {
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = '-';
            removeButton.onclick = function() {
                newStockEntry.remove(); // Remove the current form when "-" is clicked
                updateAddButtonVisibility(); // Update visibility of "+" button after removal
            };
            newStockEntry.appendChild(removeButton);
        }
        dynamicFieldsContainer.appendChild(newStockEntry);

        const updatedStockEntries = dynamicFieldsContainer.querySelectorAll('.dynFormEntry');
        if (updatedStockEntries.length >= maxStockEntries) {
            addButton.style.display = 'none';
        }
    }

    addButton.addEventListener('click', addStockForm); // Attach function using addEventListener

    updateAddButtonVisibility();
});

function updateAddButtonVisibility() {
    const dynamicFieldsContainer = document.querySelector('.dynForm');
    const stockEntries = dynamicFieldsContainer.querySelectorAll('.dynFormEntry');
    const maxEntries = 4
    const addButton1 = document.getElementById('addStock');
    // Check if the "+" button should be visible or not (limit reached)
    if (stockEntries.length >= maxEntries) {
        addButton1.style.display = 'none'; // Hide the add button after reaching the limit
    } else {
        addButton1.style.display = 'inline'; // Show the add button if there are fewer than max entries
    }

    // Update the "-" button visibility on forms
    stockEntries.forEach((entry, index) => {
        const removeButton = entry.querySelector('button[type="button"]:last-child'); // Get the last button (remove)
        if (index === stockEntries.length - 1) {
            // Don't show the "-" button on the most recent form unless it's the 4th one
            if (stockEntries.length === maxEntries) {
                removeButton.style.display = 'none';
            } else {
                removeButton.style.display = 'inline';
            }
        } else {
            // Show the "-" button on all forms except the most recent one
            removeButton.style.display = 'inline';
        }
    });
}