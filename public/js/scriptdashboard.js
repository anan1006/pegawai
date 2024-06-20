// PREVIEW IMAGE
function previewImg() {
    const image = document.querySelector("#foto_pegawai");
    const imgPreview = document.querySelector(".img-preview");

    image.style.display = "block";
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}

function confirmDelete(id) {
    Swal.fire({
        title: "Hapus Data Pegawai",
        text: "Apakah yakin akan menghapus data?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#222",
        cancelButtonColor: "#FA896B",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + id).submit();
        }
    });
}
