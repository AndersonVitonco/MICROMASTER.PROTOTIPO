<div class="main">
    <div class="topbar">
      <div class="page-title" id="topbar-title">Configuraci&oacute;n</div>
      <div class="topbar-right">
        <div class="topbar-date" id="topbar-date"></div>
      </div>
    </div>
    <div class="content">
      <div class="page active" id="page-configuracion">
        <div class="stats-row">
          <div class="stat-card"><div class="stat-label">Usuarios</div><div class="stat-value">3</div></div>
          <div class="stat-card"><div class="stat-label">Administradores</div><div class="stat-value green">1</div></div>
          <div class="stat-card"><div class="stat-label">Supervisores</div><div class="stat-value blue">1</div></div>
          <div class="stat-card"><div class="stat-label">Operadores</div><div class="stat-value amber">1</div></div>
          <div class="stat-card"><div class="stat-label">Alertas</div><div class="stat-value red">2</div></div>
        </div>
        <div class="config-grid">
          <div>
            <div class="section-divider"><h3>Gesti&oacute;n de Usuarios</h3></div>
            <div class="config-panel" style="margin-bottom:16px">
              <h3>Agregar Usuario</h3>
              <div class="form-grid">
                <div class="field"><label>Nombre</label><input type="text" placeholder="Nombre completo"></div>
                <div class="field"><label>Rol</label><select><option>Administrador</option><option>Supervisor</option><option>Operador</option></select></div>
                <div class="field span2"><label>Correo</label><input type="email" placeholder="usuario@micromaster.com"></div>
              </div>
              <div style="margin-top:14px;text-align:right"><button class="btn btn-primary" onclick="demo()">Guardar Usuario</button></div>
            </div>
            <div class="table-wrap">
              <table>
                <thead><tr><th>Usuario</th><th>Rol</th><th>Estado</th><th>Acciones</th></tr></thead>
                <tbody>
                  <tr><td><strong>Carlos Rodr&iacute;guez</strong><br><span style="font-size:11px;color:var(--text-muted)">admin@micromaster.com</span></td><td><span class="badge badge-blue">Administrador</span></td><td><span class="badge badge-green">Activo</span></td><td><div class="actions"><button class="btn-icon" onclick="demo()">✏️</button><button class="btn-icon danger" onclick="demo()">🗑️</button></div></td></tr>
                  <tr><td><strong>Marta Su&aacute;rez</strong><br><span style="font-size:11px;color:var(--text-muted)">marta@micromaster.com</span></td><td><span class="badge badge-amber">Supervisor</span></td><td><span class="badge badge-green">Activo</span></td><td><div class="actions"><button class="btn-icon" onclick="demo()">✏️</button><button class="btn-icon danger" onclick="demo()">🗑️</button></div></td></tr>
                  <tr><td><strong>Juan Paredes</strong><br><span style="font-size:11px;color:var(--text-muted)">juan@micromaster.com</span></td><td><span class="badge badge-gray">Operador</span></td><td><span class="badge badge-green">Activo</span></td><td><div class="actions"><button class="btn-icon" onclick="demo()">✏️</button><button class="btn-icon danger" onclick="demo()">🗑️</button></div></td></tr>
                </tbody>
              </table>
            </div>
          </div>
          <div>
            <div class="section-divider"><h3>Configuraci&oacute;n de Alertas</h3></div>
            <div class="config-panel" style="margin-bottom:16px">
              <h3>Nueva Alerta</h3>
              <div class="form-grid">
                <div class="field"><label>Stock M&iacute;nimo Global</label><input type="number" placeholder="10" value="10"></div>
                <div class="field"><label>D&iacute;as Antes Vencimiento</label><input type="number" placeholder="15" value="15"></div>
              </div>
              <div style="margin-top:14px;text-align:right"><button class="btn btn-primary" onclick="demo()">Guardar Alerta</button></div>
            </div>
            <div class="table-wrap">
              <table>
                <thead><tr><th>Stock M&iacute;n.</th><th>D&iacute;as Venc.</th><th>Estado</th><th>Acciones</th></tr></thead>
                <tbody>
                  <tr><td><strong>10</strong> unidades</td><td>3 d&iacute;as</td><td><span class="badge badge-amber">Monitoreo</span></td><td><div class="actions"><button class="btn-icon" onclick="demo()">✏️</button><button class="btn-icon danger" onclick="demo()">🗑️</button></div></td></tr>
                  <tr><td><strong>20</strong> unidades</td><td>7 d&iacute;as</td><td><span class="badge badge-amber">Monitoreo</span></td><td><div class="actions"><button class="btn-icon" onclick="demo()">✏️</button><button class="btn-icon danger" onclick="demo()">🗑️</button></div></td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
