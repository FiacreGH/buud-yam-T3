####################
# Plugin Formule   #
####################

plugin.tx_formule {
	settings {
		templates {
			# Remove default forms
			1 >
			2 >
			3 >

			# Key "1", "2" is already taken by the extension.
			# Use key "10", "11" and following for your own templates to be safe.

			2 {
				title = Inscription à la newsletter
				path = EXT:speciality/Resources/Private/Plugins/Formule/NewsletterSubscription.html

				# Validate mail unicity and format
				validators {
					0 = Fab\Formule\Validator\EmailUniqueValidator
					1 = Fab\Formule\Validator\EmailFormatValidator

				}
				# Persist configuration
				persist {
					tableName = tt_address

						defaultValues {
							pid = 137
						}

						processors {
							0 = Fab\Speciality\Processor\NewsletterNewProcessor
						}
					}
				# Variable to be used across the template.
				variable {
					preferencesPageUid = 139
				}

				}

			3 {
				title = Modification d'inscription Newsletter
				path = EXT:speciality/Resources/Private/Plugins/Formule/NewsletterSubscriptionEdit.html

					loaders {
						0 = Fab\Speciality\Loader\UserDataLoader
					}

					validators {
						0 = Fab\Formule\Validator\EmailUniqueValidator
						1 = Fab\Formule\Validator\EmailFormatValidator
					}

					# Persist configuration
					persist {
						tableName = tt_address
						identifierField = token

						processors {
							0 = Fab\Speciality\Processor\NewsletterEditProcessor
							1 = Fab\Speciality\Processor\NewsletterDeleteProcessor
						}
					}

					redirect {
						action = show
					}

			}

			10 {
				title = Formulaire de contact
				path = EXT:speciality/Resources/Private/Plugins/Formule/ContactForm.html

				# Validate mail unicity and format
				validators {
					0 = Fab\Formule\Validator\EmailUniqueValidator
					1 = Fab\Formule\Validator\EmailFormatValidator
				}

			}

			11 {
				title = Inscription Pour Donner
				path = EXT:speciality/Resources/Private/Plugins/Formule/GivingSubscription.html

				# Validate mail unicity and format
				validators {
					0 = Fab\Formule\Validator\EmailUniqueValidator
					1 = Fab\Formule\Validator\EmailFormatValidator
				}

			}
		}
		#hide warning in BE
		excludedFieldsFromTemplateParsing = values, delete
	}
}

