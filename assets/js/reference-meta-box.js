let referenceCount

document.addEventListener('DOMContentLoaded', () => {
    referenceCount = document.querySelectorAll('.reference').length;
    const referenceParent = document.getElementById('reference-parent');

    // add button
    document.getElementById('add-reference').addEventListener('click', () => {
        referenceCount++;
        const newReferenceDiv = document.createElement('div');
        newReferenceDiv.id = 'reference-container-' + referenceCount;
        newReferenceDiv.classList.add('reference-container');

        newReferenceDiv.innerHTML = `
            <label for="amplify_meta_reference_${referenceCount}">Reference ${referenceCount}: </label>
            <textarea class="reference" id="amplify_meta_reference_${referenceCount}" name="amplify_meta_references[]"></textarea>
            <button type="button" class="remove-reference">Remove Reference</button>
        `;
        referenceParent.appendChild(newReferenceDiv);

        newReferenceDiv.querySelector('.remove-reference').addEventListener('click', removeReference);
    });

    // remove button
    const references = document.querySelectorAll('.reference-container');
    references.forEach(reference => {
        reference.querySelector('.remove-reference').addEventListener('click', removeReference);
    });

});

function removeReference(e) {
    if (referenceCount > 1) {
        referenceCount--;
        e.target.parentElement.remove();

        const references = document.querySelectorAll('.reference-container');
        references.forEach((reference, index) => {
            reference.id = `reference-container-${index + 1}`;
            reference.querySelector('label').textContent = `Reference ${index + 1}:`;
            reference.querySelector('textarea').id = `amplify_meta_reference_${index + 1}`;
        });
    }
}