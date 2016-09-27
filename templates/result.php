			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">探查结果</h3>
				</div>
				<div class="panel-body">
					<table id="result" class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>视频URL</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i = 1;
								global $r;
								foreach ($r as $url) {
							?>
							<tr>
								<td><?php print $i; ?></td>
								<td>
									<div class="input-group">
										<input type="url" class="form-control" id="video-<?php print $i; ?>" value="<?php print $url; ?>" readonly>
										<span class="input-group-btn">
											<button class="btn btn-default copy-to-clipboard" data-clipboard-target="#video-<?php print $i; ?>" type="button"><span class="fa fa-clipboard"></span></button>
										</span>
									</div>
								</td>
							</tr>
							<?php
									$i++;
								}
							?>
						</tbody>
					</table>
				</div>
			</div>