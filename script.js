// script.js

document.getElementById("addContactForm").addEventListener("submit", function (event) {
    event.preventDefault();
  
    const firstName = document.getElementById("firstName").value;
    const phoneNumber = document.getElementById("phoneNumber").value;
  
    const formData = new FormData();
    formData.append("firstName", firstName);
    formData.append("phoneNumber", phoneNumber);
  
    fetch("add_contact.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {

          const contactList = document.getElementById("contactList");
          const newContactItem = document.createElement("li");
          newContactItem.innerHTML = `${firstName} - ${phoneNumber} <a href='delete_contact.php?id=${data.id}'>Delete</a>`;
          contactList.appendChild(newContactItem);
  

          document.getElementById("firstName").value = "";
          document.getElementById("phoneNumber").value = "";
        } else {
          alert("Kişi eklenirken bir hata oluştu.");
        }
      })
      .catch((error) => {
        console.error("Hata:", error);
        alert("Kişi eklenirken bir hata oluştu.");
      });
  });
  