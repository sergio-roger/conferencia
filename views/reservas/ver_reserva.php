
    <h3 class="titulo">Realizar reservas</h3>

    <div class="combo row">
        <div class="col-12 col-sm-7 col-md-6">
            <label for="filtro">Filtrar por:</label>
            <select name="filtro" id="cmb-filtro" class="form-control">
                <option value="lab">Laboratorio</option>
                <option value="hor">Hora inicio</option>
            </select>
        </div>
        <div class="col-12 col-sm-5 col-md-6">
            <!-- Dinamico -->
            <label for="opcion">Opciones</label>
            <select name="opcion" id="cmb-opcion" class="form-control">
                <option value="lab-1">Laboratorio 1</option>
                <option value="lab-2">Laboratorio 2</option>
            </select>
        </div>
    </div>
    
    <table class="table table-sm table-hover">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Tema</th>
            <th scope="col">Ponente</th>
            <th scope="col">Hora inicio</th>
            <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Róbotica</td>
            <td>Rubén FLores</td>
            <td>9:30:00</td>
            <td>
                <button class="btn btn-danger">Eliminar
                    <i class="icon-cancel"></i>
                </button>
            </td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Róbotica</td>
            <td>Rubén FLores</td>
            <td>9:30:00</td>
            <td>
                <button class="btn btn-danger">Eliminar
                    <i class="icon-cancel"></i>
                </button>
            </td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Róbotica</td>
            <td>Rubén FLores</td>
            <td>9:30:00</td>
            <td>
                <button class="btn btn-danger">Eliminar
                    <i class="icon-cancel"></i>
                </button>
            </td>
            </tr>
        </tbody>
    </table> 
    
</div>