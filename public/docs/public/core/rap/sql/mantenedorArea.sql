USE [CELUCT]
GO
/****** Object:  StoredProcedure [rap].[mantenedorAreas]    Script Date: 09/07/2022 16:40:53 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Osorio, Pedro>
-- Create date: <15-07-2022>
-- Description:	<Procedimiento que permite almacenar, listar, eliminar yactualizar la tabla Registro área de instrumento>
-- =============================================
ALTER PROCEDURE [rap].[mantenedorAreas]
-- Add the parameters for the stored procedure here

@accion VARCHAR(50),
@rear_codigo INT,
--@carr_codigo INT,
--@plan_codigo INT,
@tins_codigo INT,
@rear_nombre_area VARCHAR(250),
@rear_descripcion_area VARCHAR(250),
@rear_vigente CHAR(1),
@usuario_mod VARCHAR(50)

AS
BEGIN
	DECLARE @mje VARCHAR(50),
	        @area_instrumento_codigo INT;
	        

	BEGIN TRANSACTION
	BEGIN TRY
	--INSERTAR REGISTRO
	IF @accion = 'ingresar'
		BEGIN
			--Generamos codigo de registro de área de instrumento
		SET @area_instrumento_codigo = (SELECT MAX (rear_codigo) FROM CELUCT.rap.registro_area_instrumento);
		IF (@area_instrumento_codigo IS NULL )
			BEGIN
				--SET @tins_codigo = CAST(@tins_codigo AS VARCHAR) + '1';
				SET @area_instrumento_codigo = 1;
			END
		ELSE
			BEGIN
				SET @area_instrumento_codigo = @area_instrumento_codigo + 1;
			END

			INSERT INTO CELUCT.rap.registro_area_instrumento
			(
				rear_codigo,
				tins_codigo,
				rear_nombre_area,
				rear_descripcion_area,
				rear_vigente,
				usuario_mod,
				fecha_mod
			)
			VALUES
			(
				@area_instrumento_codigo,
				@tins_codigo,
				@rear_nombre_area,
				@rear_descripcion_area,
				@rear_vigente,
				@usuario_mod,
				GETDATE() 
			)
			

			IF @@ROWCOUNT > 0
			BEGIN
				INSERT INTO CELUCT.rap.log_registro_area_instrumento
			(
				rear_codigo,
				tins_codigo,
				rear_nombre_area,
				rear_descripcion_area,
				rear_vigente,
				usuario_mod,
				fecha_mod,
				alog_codigo,
				log_tmop_codigo,
				log_usuario_mod,
				log_fecha_mod
			)
			VALUES 
			(
				@area_instrumento_codigo,
				@tins_codigo,
				@rear_nombre_area,
				@rear_descripcion_area,
				@rear_vigente,
				@usuario_mod,
				GETDATE(),
				1,
				137,
				@usuario_mod,
				GETDATE()
			)
		END
	END

	--ACTUALIZAR TIPO INSTRUMENTO.
	IF @accion = 'editar'
	BEGIN
		UPDATE CELUCT.rap.registro_area_instrumento
		SET
			rear_nombre_area = @rear_nombre_area,
			rear_descripcion_area = @rear_descripcion_area,
			rear_vigente = @rear_vigente,
			usuario_mod = @usuario_mod,
			fecha_mod = GETDATE()
		WHERE tins_codigo = @tins_codigo AND rear_codigo = @rear_codigo 

			IF @@ROWCOUNT > 0
			BEGIN
				INSERT INTO CELUCT.rap.log_registro_area_instrumento
				(
					rear_codigo,
					tins_codigo,
					rear_nombre_area,
					rear_descripcion_area,
					rear_vigente,
					usuario_mod,
					fecha_mod,
					alog_codigo,
					log_tmop_codigo,
					log_usuario_mod,
					log_fecha_mod
				)
				VALUES 
				(
					@rear_codigo,
					@tins_codigo,
					@rear_nombre_area,
					@rear_descripcion_area,
					@rear_vigente,
					@usuario_mod,
					GETDATE(),
					2,
					137,
					@usuario_mod,
					GETDATE()
				)
			END
	END

	--ELIMINAR
	IF @accion = 'eliminar'
	BEGIN
		INSERT INTO CELUCT.rap.log_registro_area_instrumento
		(
			rear_codigo,
			tins_codigo,
			rear_nombre_area,
			rear_descripcion_area,
			rear_vigente,
			usuario_mod,
			fecha_mod,
			alog_codigo,
			log_tmop_codigo,
			log_usuario_mod,
			log_fecha_mod
		)
		SELECT
			rear_codigo,
			tins_codigo,
			rear_nombre_area,
			rear_descripcion_area,
			rear_vigente,
			--@rear_codigo,
			--@tins_codigo,
			--@rear_nombre_area,
			--@rear_descripcion_area,
			--'N',
			@usuario_mod,
			GETDATE(),
			3,
			137,
			@usuario_mod,
			GETDATE()
			FROM CELUCT.rap.log_registro_area_instrumento
			WHERE rear_codigo = @rear_codigo --AND tins_codigo = @tins_codigo
		--INICIO ELIMINAR ÁREA INSTRUMENTO
		DELETE FROM CELUCT.rap.registro_area_instrumento
		WHERE rear_codigo = @rear_codigo --AND tins_codigo = @tins_codigo

		IF @@ROWCOUNT > 0
		BEGIN
			SET @mje='DATOS ELIMINADOS CORRECTAMENTE';
		END

		ELSE
		BEGIN
			SET @mje='ERROR, FAVOR REVISAR.';
		END
		--FIN ELIMINAR TIPO ÁREAS
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
