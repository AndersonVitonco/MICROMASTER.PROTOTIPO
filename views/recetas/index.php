<div class="main">
  <div class="topbar">
    <div class="page-title" id="topbar-title">Recetas</div>
    <div class="topbar-right"><div class="topbar-date" id="topbar-date"></div></div>
  </div>
  <div class="content">
    <div class="page active" id="page-recetas">
      <div class="stats-row">
        <div class="stat-card"><div class="stat-label">Total Recetas</div><div class="stat-value"><?php echo count($listaRecetas); ?></div><div class="stat-sub">activas</div></div>
        <div class="stat-card"><div class="stat-label">Costo Promedio</div><div class="stat-value green">$<?php echo number_format($costoPromedio, 2); ?></div><div class="stat-sub">por receta</div></div>
        <div class="stat-card"><div class="stat-label">Categor&iacute;as</div><div class="stat-value blue"><?php echo count($categoriasUnicas); ?></div><div class="stat-sub">distintas</div></div>
      </div>
      <div class="toolbar">
        <div class="search-box"><span class="icon-inline light">🔍</span><input type="text" placeholder="Buscar receta..."></div>
        <select class="filter-select"><option>Todas las categor&iacute;as</option><option>Panader&iacute;a</option><option>Reposter&iacute;a</option><option>Bebidas</option></select>
        <button class="btn btn-primary" onclick="openModal('modal-rec')">+ Agregar Receta</button>
      </div>
      <div class="table-wrap">
        <table>
          <thead><tr><th>Nombre</th><th>Categor&iacute;a</th><th>Insumos</th><th>Costo Unitario</th><th>Estado</th><th>Acciones</th></tr></thead>
          <tbody id="recetas-tbody">
            <?php if (!empty($listaRecetas)): ?>
              <?php foreach ($listaRecetas as $receta): ?>
                <?php $catLower = mb_strtolower($receta['categoria']); $badgeClass='badge-gray'; if (str_contains($catLower,'panad')) $badgeClass='badge-amber'; elseif (str_contains($catLower,'repost')) $badgeClass='badge-blue'; elseif (str_contains($catLower,'bebida')) $badgeClass='badge-green'; ?>
                <tr style="border-bottom:1px solid var(--border);">
                  <td style="padding:14px 16px;text-align:left;"><strong><?php echo htmlspecialchars($receta['nombre']); ?></strong><br><span style="font-size:11px;color:var(--text-muted);font-family:'DM Mono',monospace;font-weight:500;color:var(--primary);"><?php echo htmlspecialchars($receta['codigo']); ?></span></td>
                  <td style="padding:14px 16px;text-align:left;"><span class="badge <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($receta['categoria']); ?></span></td>
                  <td style="padding:14px 16px;font-family:'DM Sans',sans-serif;font-size:12px;color:var(--text);text-align:left;"><?php echo htmlspecialchars($receta['insumos']); ?></td>
                  <td style="padding:14px 16px;font-family:'DM Mono',monospace;font-weight:700;color:var(--teal);text-align:left;">$<?php echo htmlspecialchars($receta['rendimiento']); ?></td>
                  <td style="padding:14px 16px;text-align:left;"><span class="badge badge-green">Activa</span></td>
                  <td style="padding:14px 16px;text-align:left;"><div class="actions"><button class="btn-icon" onclick="verRecetaFicha(this.closest('tr'),true)">✏️</button><button class="btn-icon" onclick="verRecetaFicha(this.closest('tr'),false)">👁️</button><button class="btn-icon danger" onclick="eliminarRecetaReal(<?php echo $receta['id_receta']; ?>)">🗑️</button></div></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="6" style="padding:30px;text-align:center;color:var(--text-muted);font-family:'DM Sans',sans-serif;font-size:14px;">No hay recetas registradas en la base de datos.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
