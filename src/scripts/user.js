let isEditing = false;
let originalValues = {};

function toggleEdit(event) {
    const editableFields = ["username", "email"];
    const buttonContainer = event.target.parentElement;

    if (!isEditing) {
        buttonContainer.innerHTML = `
          <button class="save-btn" onclick="saveChanges(event)">Save Changes</button>
          <button class="cancel-btn" onclick="cancelEdit(event)">Cancel</button>
        `;
        // Store original values
        editableFields.forEach((fieldId) => {
            const element = buttonContainer.parentElement.getElementsByClassName(fieldId)[0];
            originalValues[fieldId] = element.textContent;
            element.contentEditable = "plaintext-only";
        });

        isEditing = true;
    }
}

function saveChanges(event) {

    const editableFields = ["username", "email"];
    const buttonContainer = event.target.parentElement;

    editableFields.forEach((fieldId) => {
        const element = buttonContainer.parentElement.getElementsByClassName(fieldId)[0];
        //TODO: Here you would typically send the updated data to the server via AJAX
        if (element.textContent.trim() === "") {
            element.textContent = originalValues[fieldId];
        } else if(element.textContent !== originalValues[fieldId]) {
            console.log(`Updated ${fieldId} to: ${element.textContent}`);
        }
        originalValues[fieldId] = element.textContent;
        element.contentEditable = "false";
    });

    buttonContainer.innerHTML = `
        <button class="edit-btn" onclick="toggleEdit(event)">Edit</button>
      `;

    isEditing = false;
    originalValues = {};

}

function cancelEdit(event) {

    const editableFields = ["username", "email"];
    const buttonContainer = event.target.parentElement;

    editableFields.forEach((fieldId) => {
        const element = buttonContainer.parentElement.getElementsByClassName(fieldId)[0];
        element.textContent = originalValues[fieldId];
        element.contentEditable = "false";
    });

    buttonContainer.innerHTML = `
        <button class="edit-btn" onclick="toggleEdit(event)">Edit</button>
      `;

    isEditing = false;
    originalValues = {};

}
