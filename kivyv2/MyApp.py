from kivymd.app import MDApp
from kivymd.uix.screenmanager import MDScreenManager
from views.CourseScreen import CourseScreen

class MyApp(MDApp):
    # Mètode per crear la classe, aquí estaria l'inici
    def build(self):
        self.title ="Inici"
        
"""
        sm = MDScreenManager()
        sm.add_widget(CourseScreen.CourseScreen())
        return sm
"""        


if __name__ == "__main__":
    MyApp().run()
