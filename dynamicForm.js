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
            <label for="stockSymbol">Enter Stock Abbreviation Symbol</label>
            <input type="text" id="stockSymbol" name="stockSymbol[]" required>
            <label for="partialAmt">Amount to Invest in This Stock</label>
            <input type="number" id="partialAmt" name="partialAmt[]" required>
        `;
        dynamicFieldsContainer.appendChild(newStockEntry);

        const updatedStockEntries = dynamicFieldsContainer.querySelectorAll('.dynFormEntry');
        if (updatedStockEntries.length >= maxStockEntries) {
            addButton.style.display = 'none';
        }
    }

    addButton.addEventListener('click', addStockForm); // Attach function using addEventListener
});
