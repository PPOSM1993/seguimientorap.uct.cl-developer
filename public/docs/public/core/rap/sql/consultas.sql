EXEC CELUCT.rap.mantenedorInstrumento
@accion = 'ingresar',
@tins_codigo = 1,
@carr_codigo = 224,
@plan_codigo = 4,
@tins_nombre = 'Instrumento 1',
@tins_descripcion = 'Ejemplo Descripción Instrumento 1',
@tins_vigente = 'S',
@usuario_mod =  18484885,
@fecha_mod = '06-07-2022'

EXEC CELUCT.rap.mantenedorInstrumento
@accion = 'editar',
@tins_codigo = 1,
@carr_codigo = 224,
@plan_codigo = 4,
@tins_nombre = 'Instrumento 1',
@tins_descripcion = 'Ejemplo Descripción Instrumento 1',
@tins_vigente = 'S',
@usuario_mod =  18484885,
@fecha_mod = '06-07-2022'

EXEC CELUCT.rap.mantenedorInstrumento
@accion = 'eliminar',
@tins_codigo = 1,
@carr_codigo = 224,
@plan_codigo = 4,
@tins_nombre = 'Instrumento 1',
@tins_descripcion = 'Ejemplo Descripción Instrumento 1',
@tins_vigente = 'S',
@usuario_mod =  18484885,
@fecha_mod = '06-07-2022'

SELECT * FROM CELUCT.rap.tipo_instrumento
SELECT * FROM CELUCT.rap.log_tipo_instrumento