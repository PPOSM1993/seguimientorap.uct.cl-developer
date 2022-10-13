USE [CELUCT]
GO
/****** Object:  StoredProcedure [rap].[mantenedorInstrumento]    Script Date: 07/13/2022 09:13:03 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Osorio, Pedro>
-- Create date: <2022-07-04>
-- Description:	<Creación del Procedimiento Almacenado>
-- =============================================
ALTER PROCEDURE [rap].[mantenedorInstrumento]

@accion VARCHAR(50),
@tins_codigo INT,
@carr_codigo INT,
@plan_codigo INT,
@tins_nombre VARCHAR(250),
@tins_descripcion VARCHAR(250),
@tins_vigente CHAR(1),
@usuario_mod VARCHAR(250)

AS
BEGIN
	DECLARE @mje VARCHAR(50),
	        @intrumento_codigo INT;

	BEGIN TRANSACTION
	BEGIN TRY
			
    -- Insert statements for procedure here
    IF @accion = 'ingresar'
		BEGIN
		--SET @tins_codigo = 2;
		--Generamos codigo de registro de área de instrumento
		SET @intrumento_codigo = (SELECT MAX (tins_codigo) FROM CELUCT.rap.tipo_instrumento);
		IF (@intrumento_codigo IS NULL )
			BEGIN
				--SET @tins_codigo = CAST(@tins_codigo AS VARCHAR) + '1';
				SET @intrumento_codigo = 1;
			END
		ELSE
			BEGIN
				SET @intrumento_codigo = @intrumento_codigo + 1;
            END
            
        INSERT INTO CELUCT.rap.tipo_instrumento
        (
			tins_codigo,
			carr_codigo,
			plan_codigo,
			tins_nombre,
			tins_descripcion,
			tins_vigente,
			usuario_mod,
			fecha_mod
        )
        VALUES
        (
			@intrumento_codigo,
			@carr_codigo,
			@plan_codigo,
			@tins_nombre,
			@tins_descripcion,
			@tins_vigente,
			@usuario_mod,
			GETDATE()
        )
        IF @@ROWCOUNT > 0
		BEGIN
			INSERT INTO CELUCT.rap.log_tipo_instrumento
			(
				tins_codigo,
				carr_codigo,
				plan_codigo,
				tins_nombre,
				tins_descripcion,
				tins_vigente,
				usuario_mod,
				fecha_mod,
				alog_codigo,
				log_tmop_codigo,
				log_usuario_mod,
				log_fecha_mod
			)
			VALUES
			(
				@intrumento_codigo,
				@carr_codigo,
				@plan_codigo,
				@tins_nombre,
				@tins_descripcion,
				@tins_vigente,
				@usuario_mod,
				GETDATE(),
				1, -- 1: insertar
				137, --proceso de inserción
				@usuario_mod,
				GETDATE()
			)
		END --Fin Función Insertar
	END
	
	--ACTUALIZAR TIPO INSTRUMENTO.
	IF @accion = 'editar'

		BEGIN
			UPDATE CELUCT.rap.tipo_instrumento
			SET 
				tins_nombre = @tins_nombre,
				tins_descripcion = @tins_descripcion,
				tins_vigente = @tins_vigente
			WHERE tins_codigo = @tins_codigo AND carr_codigo = @carr_codigo AND plan_codigo = @plan_codigo
			
			IF @@ROWCOUNT > 0
				BEGIN
					INSERT INTO CELUCT.rap.log_tipo_instrumento
					(
						tins_codigo,
						carr_codigo,
						plan_codigo,
						tins_nombre,
						tins_descripcion,
						tins_vigente,
						usuario_mod,
						fecha_mod,
						alog_codigo,
						log_tmop_codigo,
						log_usuario_mod,
						log_fecha_mod
					)
					VALUES
						(
						@tins_codigo,
						@carr_codigo,
						@plan_codigo,
						@tins_nombre,
						@tins_descripcion,
						@tins_vigente,
						@usuario_mod,
						GETDATE(),
						2, -- 2: Editar
						137, --Proceso de Inserción
						@usuario_mod,
						GETDATE()
					)
				END
		END --Fin Editar
    
    --ELIMINAR TIPO INSTRUMENTO
    
    IF @accion = 'eliminar'
    BEGIN
    
			INSERT INTO CELUCT.rap.log_tipo_instrumento
			(
				tins_codigo,
				carr_codigo,
				plan_codigo,
				tins_nombre,
				tins_descripcion,
				tins_vigente,
				usuario_mod,
				fecha_mod,
				alog_codigo,
				log_tmop_codigo,
				log_usuario_mod,
				log_fecha_mod
			)
			SELECT
			
				@tins_codigo,
				@carr_codigo,
				@plan_codigo,
				@tins_nombre,
				@tins_descripcion,
				@tins_vigente,
				@usuario_mod,
				fecha_mod,
				3,
				137,
				@usuario_mod,
				GETDATE()
				FROM CELUCT.rap.tipo_instrumento
				WHERE tins_codigo = @tins_codigo AND carr_codigo = @carr_codigo
    --INICIO ELIMINAR TIPO INSTRUMENTO
		DELETE FROM CELUCT.rap.tipo_instrumento
		WHERE tins_codigo = @tins_codigo
		
	    IF @@ROWCOUNT > 0
        BEGIN                        
			SET @mje='DATOS ELIMINADOS CORRECTAMENTE';
        END
        
        ELSE
        BEGIN                        
			SET @mje='ERROR, FAVOR REVISAR.';
        END
        --FIN ELIMINAR TIPO INSTRUMENTO
    END
    --print @mje;
    		COMMIT TRAN
				
			SELECT
			'true' AS success,
			'SENTENCIAS EJECUTADAS CORRECTAMENTE' AS MENSAJE, 
			@mje AS mje,
			0 AS ErrorNumber,
			'' AS ErrorMessage
			
   END TRY
   
   BEGIN CATCH
			ROLLBACK;
			SELECT
			'false' AS success,
			'lo sentimos no se pudieron guardar los datos, favor intentelo nuevamente' AS mje,
			ERROR_NUMBER() AS ErrorNumber,
			ERROR_MESSAGE() AS ErrorMessage
   END CATCH
END