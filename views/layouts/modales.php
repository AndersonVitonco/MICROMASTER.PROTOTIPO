<!-- Modal Inventario -->
<div class="modal-overlay" id="modal-inv">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title">Agregar Insumo</div>
      <button class="modal-close" onclick="closeModal('modal-inv')">✕</button>
    </div>
    <div class="form-grid">
      <div class="field"><label>Nombre</label><input type="text" id="ins-nombre" placeholder="Nombre del insumo"></div>
      <div class="field"><label>Categor&iacute;a</label>
        <select id="ins-categoria">
          <option>L&aacute;cteos</option><option>Cereales</option><option>Prote&iacute;nas</option><option>Vegetales</option><option>Bebidas</option><option>Condimentos</option><option>Grasas</option>
        </select>
      </div>
      <div class="field"><label>Cantidad</label><input type="number" id="ins-cantidad" placeholder="0"></div>
      <div class="field"><label>Unidad</label>
        <select id="ins-unidad">
          <option>kg</option><option>L</option><option>g</option><option>ml</option><option>u</option>
        </select>
      </div>
      <div class="field"><label>Stock M&iacute;nimo</label><input type="number" placeholder="0"></div>
      <div class="field"><label>Stock M&aacute;ximo</label><input type="number" placeholder="0"></div>
      <div class="field"><label>Precio/Unidad</label><input type="number" placeholder="0.00"></div>
      <div class="field"><label>Vencimiento</label><input type="date"></div>
      <div class="field span2"><label>Proveedor</label><input type="text" placeholder="Nombre del proveedor"></div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-inv')">Cancelar</button>
      <button class="btn btn-primary" onclick="procesarNuevoInsumo()">Guardar Insumo</button>
    </div>
  </div>
</div>

<!-- Modal Recetas -->
<div class="modal-overlay" id="modal-rec">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title">Nueva Receta</div>
      <button class="modal-close" onclick="closeModal('modal-rec')">✕</button>
    </div>
    <div class="form-grid">
      <div class="field span2"><label>Nombre de la Receta</label><input type="text" id="rec-nombre" placeholder="Ej: Pan de queso"></div>
      <div class="field"><label>Categor&iacute;a</label>
        <select id="rec-categoria">
          <option>Panader&iacute;a</option><option>Reposter&iacute;a</option><option>Bebidas</option><option>Platos</option>
        </select>
      </div>
      <div class="field"><label>Costo Estimado</label><input type="number" id="rec-rendimiento" placeholder="0.00"></div>
      <div class="field span2"><label>Insumos (separados por coma)</label><input type="text" id="rec-insumos" placeholder="Harina 1kg, Sal 20g, Leche 0.6L"></div>
      <div class="field span2"><label>Descripci&oacute;n</label><textarea placeholder="Descripci&oacute;n del proceso de preparaci&oacute;n..."></textarea></div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-rec')">Cancelar</button>
      <button class="btn btn-primary" onclick="procesarNuevaReceta()">Guardar Receta</button>
    </div>
  </div>
</div>

<!-- Modal Env&iacute;os -->
<div class="modal-overlay" id="modal-env">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title">Nuevo Env&iacute;o</div>
      <button class="modal-close" onclick="closeModal('modal-env')">✕</button>
    </div>
    <div class="form-grid">
      <div class="field span2"><label>Destino</label><input type="text" id="env-destino" placeholder="Nombre del cliente / establecimiento"></div>
      <div class="field"><label>Fecha Env&iacute;o</label><input type="date" id="env-fecha"></div>
      <div class="field"><label>Estado Inicial</label>
        <select id="env-estado"><option>Pendiente</option><option>En tr&aacute;nsito</option><option>Entregado</option></select>
      </div>
      <div class="field span2"><label>Insumos a enviar</label><textarea id="env-insumos" placeholder="Ej: Leche 20L, Aceite 10L, Harina 5kg"></textarea></div>
      <div class="field"><label>Total Estimado ($)</label><input type="number" id="env-total" placeholder="0.00"></div>
      <div class="field"><label>Observaciones</label><input type="text" id="env-obs" placeholder="Notas adicionales"></div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-outline" onclick="closeModal('modal-env')">Cancelar</button>
      <button class="btn btn-primary" onclick="procesarNuevoPedido()">Crear Env&iacute;o</button>
    </div>
  </div>
</div>

<!-- Toast -->
<div class="toast" id="toast">
  <span id="toast-icon" class="icon-inline small">✅</span>
  <span id="toast-msg">Acci&oacute;n completada</span>
</div>
