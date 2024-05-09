<input type="hidden" name="id_contato[]" @isset($item) value="{{ $item->id }}" @endisset>
<div class="row linha-add mt-3">
    <div class="col-12 text-end">
        <div class="form-check form-switch d-inline-block ms-auto">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
        </div>
    </div>
    <div class="col-lg-5">
        <label for="nome_contato">Nome</label>
        <input type="text" class="form-control" name="nome_contato[]" id="nome_contato" maxlength="30" required @isset($item) value="{{ $item->name }}" @endisset>
    </div>
    <div class="col-lg-3">
        <label for="cpf_contato">CPF</label>
        <input type="text" class="form-control" name="cpf_contato[]" id="cpfcnpj" maxlength="30" @isset($item) value="{{ $item->document }}" @endisset>
    </div>
    <div class="col-lg-4">
        <label for="email_contato">E-mail</label>
        <input type="email" class="form-control" name="email_contato[]" id="email_contato" maxlength="30" required @isset($item) value="{{ $item->email }}" @endisset>
    </div>
    <div class="col-lg-4">
        <label for="telefone_contato">Telefone</label>
        <input type="text" class="form-control phone" name="telefone_contato[]" id="telefone_contato" maxlength="30" required @isset($item) value="{{ $item->phone }}" @endisset>
    </div>
    <div class="col-lg-4">
        <label for="whatsapp_contato">Whatsapp</label>
        <input type="text" class="form-control phone" name="whatsapp_contato[]" id="whatsapp_contato" maxlength="30" @isset($item) value="{{ $item->whatsapp }}" @endisset>
    </div>
    <div class="col-lg-3">
        <label for="cargo_contato">Cargo</label>
        <input type="text" class="form-control" name="cargo_contato[]" id="cargo_contato" maxlength="30" @isset($item) value="{{ $item->role }}" @endisset>
    </div>
    <div class="col-md-1">
        <a href="javascript:;" class="button-actions text-secondary font-weight-bold text-xs me-2 deletarLinha" @isset($item)data-contact="{{ $key }}" @endisset>
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
    </div>
</div>