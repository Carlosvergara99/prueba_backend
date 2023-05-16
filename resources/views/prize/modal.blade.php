<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabe1">Asignar premio  </h5>
                <h5 class="modal-title" id="staticBackdropLabe2">Actualizar permio </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <div class="mb-3">
                        <label class="form-label"> Nombre Y Apellido </label>
                        <input type="text" class="form-control" id="name" placeholder="Nombre y apellido">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"> Dirección </label>
                        <input type="text" class="form-control" id="address" placeholder="Dirección">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"> Telefono </label>
                        <input type="number" class="form-control" id="phone" placeholder="Telefono">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"> Email </label>
                        <input type="email" class="form-control" id="email" placeholder="EMAIL">
                    </div>

                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id_product" >
                    </div>

                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id" >
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary createProduct" id="create">Asignar</button>
                <button type="button" class="btn btn-primary UpdateProduct" id="update">Actualizar</button>
            </div>
        </div>
    </div>
</div>
