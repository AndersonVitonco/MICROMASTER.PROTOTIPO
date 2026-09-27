<div class="main">
    <div class="topbar">
      <div class="page-title" id="topbar-title">Reportes</div>
      <div class="topbar-right">
        <div class="topbar-date" id="topbar-date"></div>
      </div>
    </div>
    <div class="content">
      <div class="page active" id="page-reportes">
        <div class="tab-row">
          <button class="tab-btn active" onclick="switchReportTab('metricas', this)"><span class="icon-inline small">📊</span>M&eacute;tricas</button>
          <button class="tab-btn" onclick="switchReportTab('trazabilidad', this)"><span class="icon-inline small">📋</span>Trazabilidad</button>
          <button class="tab-btn" onclick="switchReportTab('documentos', this)"><span class="icon-inline small">📄</span>Documentos</button>
          <button class="tab-btn" onclick="switchReportTab('descargas', this)"><span class="icon-inline small">💾</span>Descargas</button>
        </div>
        <div id="rtab-metricas">
          <div class="kpi-grid">
            <div class="kpi-card">
              <div class="kpi-icon">💰</div>
              <div class="kpi-value">$<?php echo number_format($ventasTotales, 2); ?></div>
              <div class="kpi-label">Valor Inventario</div>
            </div>
            <div class="kpi-card">
              <div class="kpi-icon">📋</div>
              <div class="kpi-value"><?php echo $totalEnviosReporte; ?></div>
              <div class="kpi-label">Costo Prom. Receta</div>
            </div>
            <div class="kpi-card">
              <div class="kpi-icon">⚠️</div>
              <div class="kpi-value" style="color:var(--amber)"><?php echo $totalInsumosReporte; ?></div>
              <div class="kpi-label">Alertas Activas</div>
            </div>
            <div class="kpi-card">
              <div class="kpi-icon">🍽️</div>
              <div class="kpi-value" style="color:var(--teal)">4</div>
              <div class="kpi-label">Recetas Activas</div>
            </div>
          </div>
          <div class="chart-row">
            <div class="chart-card">
              <div class="chart-title">Valor de Inventario por Categor&iacute;a</div>
              <div class="chart-sub">Distribuci&oacute;n del valor total de insumos</div>
              <div class="chart-wrap"><canvas id="chartCategoria"></canvas></div>
            </div>
            <div class="chart-card">
              <div class="chart-title">Estado del Stock</div>
              <div class="chart-sub">Disponible / Bajo stock / Agotado</div>
              <div class="chart-wrap"><canvas id="chartStock"></canvas></div>
            </div>
            <div class="chart-card wide">
              <div class="chart-title">Evoluci&oacute;n de Costos de Producci&oacute;n</div>
              <div class="chart-sub">&Uacute;ltimos 6 meses &mdash; tendencia de costos</div>
              <div class="chart-wrap" style="height:180px"><canvas id="chartEvolucion"></canvas></div>
            </div>
          </div>
        </div>
        <div id="rtab-trazabilidad" style="display:none">
          <div class="toolbar">
            <div class="search-box"><span class="icon-inline small">🔍</span><input type="text" placeholder="Buscar en historial..."></div>
            <select class="filter-select"><option>Todas las acciones</option><option>Crear insumo</option><option>Editar receta</option><option>Crear env&iacute;o</option><option>Cambiar estado</option></select>
            <button class="btn btn-outline" onclick="demo()">📥 Exportar CSV</button>
          </div>
          <div class="table-wrap">
            <table>
              <thead><tr><th>Fecha</th><th>Usuario</th><th>Acci&oacute;n</th><th>Detalle</th></tr></thead>
              <tbody>
                <tr><td style="font-family:DM Mono,monospace;font-size:11px">2024-01-16 10:30</td><td><span class="badge badge-blue">admin</span></td><td><span class="badge badge-amber">Cambiar estado env&iacute;o</span></td><td>ENV-002: Pendiente &rarr; En tr&aacute;nsito</td></tr>
                <tr><td style="font-family:DM Mono,monospace;font-size:11px">2024-01-16 09:00</td><td><span class="badge badge-blue">admin</span></td><td><span class="badge badge-green">Crear env&iacute;o</span></td><td>ENV-001 a Restaurante El Sabor ($245.00)</td></tr>
                <tr><td style="font-family:DM Mono,monospace;font-size:11px">2024-01-15 15:20</td><td><span class="badge badge-gray">operador</span></td><td><span class="badge badge-amber">Editar receta</span></td><td>Pan Franc&eacute;s &mdash; modific&oacute; cantidad de harina</td></tr>
                <tr><td style="font-family:DM Mono,monospace;font-size:11px">2024-01-15 14:30</td><td><span class="badge badge-blue">admin</span></td><td><span class="badge badge-green">Crear insumo</span></td><td>Leche entera (85L, $1.20/L)</td></tr>
                <tr><td style="font-family:DM Mono,monospace;font-size:11px">2024-01-14 11:15</td><td><span class="badge badge-gray">supervisor</span></td><td><span class="badge badge-green">Crear receta</span></td><td>Torta de Chocolate &mdash; 5 insumos, $6.20/u</td></tr>
                <tr><td style="font-family:DM Mono,monospace;font-size:11px">2024-01-13 09:45</td><td><span class="badge badge-blue">admin</span></td><td><span class="badge badge-red">Eliminar insumo</span></td><td>Levadura (5kg) &mdash; fuera de cat&aacute;logo</td></tr>
              </tbody>
            </table>
          </div>
        </div>
        <div id="rtab-documentos" style="display:none">
          <div class="upload-area" onclick="demo()">
            <div class="upload-icon">📁</div>
            <div class="upload-title">Arrastra archivos aqu&iacute; o haz clic para subir</div>
            <div class="upload-sub">Formatos: Excel (.xlsx, .xls), Word (.doc, .docx), PDF &mdash; M&aacute;x. 10MB</div>
          </div>
          <div class="table-wrap">
            <table>
              <thead><tr><th>Nombre</th><th>Tipo</th><th>Tama&ntilde;o</th><th>Subido</th><th>Acciones</th></tr></thead>
              <tbody>
                <tr><td><span class="icon-inline small">📊</span><strong>Inventario_Enero_2024.xlsx</strong></td><td><span class="badge badge-green">Excel</span></td><td style="font-size:12px">248 KB</td><td style="font-size:12px">2024-01-15 14:22</td><td><div class="actions"><button class="btn btn-xs btn-outline" onclick="demo()"><span class="icon-inline small">👁️</span>Ver</button><button class="btn btn-xs btn-primary" onclick="demo()"><span class="icon-inline small">⬇️</span>Descargar</button><button class="btn-icon danger" onclick="demo()">🗑️</button></div></td></tr>
                <tr><td><span class="icon-inline small">📄</span><strong>Reporte_Q4_2023.pdf</strong></td><td><span class="badge badge-red">PDF</span></td><td style="font-size:12px">1.2 MB</td><td style="font-size:12px">2024-01-10 09:30</td><td><div class="actions"><button class="btn btn-xs btn-outline" onclick="demo()"><span class="icon-inline small">👁️</span>Ver</button><button class="btn btn-xs btn-primary" onclick="demo()"><span class="icon-inline small">⬇️</span>Descargar</button><button class="btn-icon danger" onclick="demo()">🗑️</button></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>
        <div id="rtab-descargas" style="display:none">
          <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:14px">
            <div class="calc-panel">
              <h3><span class="section-icon">📦</span>Inventario Actual</h3>
              <p style="font-size:12px;color:var(--text-muted);margin-bottom:16px">Exportar lista completa de insumos con stock y precios</p>
              <div style="display:flex;gap:8px;flex-wrap:wrap"><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📊</span>Excel</button><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📋</span>CSV</button><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📄</span>PDF</button></div>
            </div>
            <div class="calc-panel">
              <h3><span class="section-icon">📋</span>Lista de Recetas</h3>
              <p style="font-size:12px;color:var(--text-muted);margin-bottom:16px">Recetas activas con costos e insumos detallados</p>
              <div style="display:flex;gap:8px;flex-wrap:wrap"><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📊</span>Excel</button><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📋</span>CSV</button><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📄</span>PDF</button></div>
            </div>
            <div class="calc-panel">
              <h3><span class="section-icon">🚚</span>Historial de Env&iacute;os</h3>
              <p style="font-size:12px;color:var(--text-muted);margin-bottom:16px">Todos los env&iacute;os con estados y montos</p>
              <div style="display:flex;gap:8px;flex-wrap:wrap"><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📊</span>Excel</button><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📋</span>CSV</button><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📄</span>PDF</button></div>
            </div>
            <div class="calc-panel">
              <h3><span class="section-icon">🔍</span>Trazabilidad / Auditor&iacute;a</h3>
              <p style="font-size:12px;color:var(--text-muted);margin-bottom:16px">Historial completo de cambios del sistema</p>
              <div style="display:flex;gap:8px;flex-wrap:wrap"><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📊</span>Excel</button><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📋</span>CSV</button><button class="btn btn-outline btn-sm" onclick="demo()"><span class="icon-inline small">📄</span>PDF</button></div>
            </div>
            <div class="calc-panel">
              <h3><span class="section-icon">📊</span>Resumen de M&eacute;tricas</h3>
              <p style="font-size:12px;color:var(--text-muted);margin-bottom:16px">KPIs y gr&aacute;ficos del sistema en un reporte ejecutivo</p>
              <div style="display:flex;gap:8px"><button class="btn btn-primary btn-sm" onclick="demo()"><span class="icon-inline small">📄</span>Descargar PDF</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
