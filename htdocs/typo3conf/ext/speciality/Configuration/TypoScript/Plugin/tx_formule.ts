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
				title = formulaire d'inscription à la newsletter
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
				title = Modification d'inscription newsletter
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
				title = Formulaire de don
				path = EXT:speciality/Resources/Private/Plugins/Formule/GivingSubscription.html

				# Validate mail unicity and format
				validators {
					0 = Fab\Formule\Validator\EmailFormatValidator
				}

			}
			12 {
				title = Inscription de membre
				path = EXT:speciality/Resources/Private/Plugins/Formule/MemberSubscription.html

				# Validate mail unicity and format
				validators {
					0 = Fab\Formule\Validator\EmailUniqueValidator
					1 = Fab\Formule\Validator\EmailFormatValidator
				}

				# Persist configuration
				persist {
					tableName = tx_speciality_member
					defaultValues {
						pid = 144
						occupation = Membre
					}

					processors {
						0 = Fab\Speciality\Processor\MemberNewProcessor
					}
				}
				variable {
					preferencesPageUid = 145
				}
			}
			13 {
				title = Modification de membre
				path = EXT:speciality/Resources/Private/Plugins/Formule/MemberSubscriptionEdit.html

				loaders {
					0 = Fab\Speciality\Loader\MemberDataLoader
				}

				validators {
					0 = Fab\Formule\Validator\EmailUniqueValidator
					1 = Fab\Formule\Validator\EmailFormatValidator
				}

				# Persist configuration
				persist {
					tableName = tx_speciality_member
					identifierField = token

					processors {
						0 = Fab\Speciality\Processor\MemberEditProcessor
						1 = Fab\Speciality\Processor\MemberDeleteProcessor
					}
				}

				redirect {
					action = show
				}

			}
		}
		#hide warning in BE
		excludedFieldsFromTemplateParsing = values, delete
	}
}

