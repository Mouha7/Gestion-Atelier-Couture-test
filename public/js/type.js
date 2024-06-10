document.addEventListener("DOMContentLoaded", async (e) => {
    const response = await fetch("http://localhost:8000/?controller=api-type&action=api-liste");
    const types = await response.json();
    console.log(types);
});