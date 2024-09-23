<div>
  <div class="col-md-3 mb-3">
    <label for="inicio">Início</label>
    <input type="date" class="form-control" name="inicio[]" id="inicio" maxlength="30" required>
  </div>
  <div class="col-md-3 mb-3">
      <label for="termino">Término</label>
      <input type="date" class="form-control" name="termino[]" id="termino" maxlength="30" required>
  </div>
  <div class="col-md-3 mb-3">
      <label for="company">Empresa</label>
      <livewire:select-component type="empresas" placeholder="Selecione a empresa" name="empresas[]" id="empresas" selected='' />
  </div>
  <div class="col-md-3 mb-3">
      <label for="modeloVeiculo">Modelo de veículo</label>
      <livewire:select-component 
          type="vehicles_plate" 
          placeholder="Selecione o modelo do veículo" 
          name="vehicleModel[]" 
          id="vehicleModel" 
          :selected="$vehicleModel" 
          :filter-by-type="$typesVehicle"  
      /> 
  </div>
  <div class="col-md-3 mb-3">
      <label for="servico">Língua</label>
      <livewire:select-component type="languages" placeholder="Selecione a língua" name="employeeLanguage[]" id="employeeLanguage" selected='' />
  </div>
  <div class="col-md-3 mb-3">
      <label for="servico">Especialidades</label>
      <livewire:select-component type="especialization_general" placeholder="Selecione a especialidade" name="employeeSpeciality[]" id="employeeSpeciality" selected='' />
  </div>
  <div class="col-md-4 mb-3">
      <label for="motoristaVeiculo">Motorista</label>
      <livewire:select-component type="employee_driver" placeholder="Selecione o motorista" name="employee[]" id="employee" selected='' />
  </div>
  <div class="col-md-1">
      <a href="#">
          <i class="fa fa-trash"></i>
      </a>
  </div>
  <div class="col-md-1">
      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa fa-circle-info"></i>
      </a>
  </div>
</div>